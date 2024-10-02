// Function to fetch and process the test data
async function fetchTestData(url) {
    try {
        const response = await fetch(url);
        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Error loading or parsing the JSON file:', error);
        return null;
    }
}

// Function to group data by unique pairs of x and y and calculate the average z
function calculateAverages(data) {
    const groupedData = {};

    data.forEach(item => {
        const key = `${item.numCustomers}-${item.numAvailableCashouts}`;
        if (!groupedData[key]) {
            groupedData[key] = { x: item.numCustomers, y: item.numAvailableCashouts, zValues: [] };
        }
        groupedData[key].zValues.push(item.timeTaken);
    });

    const averages = [];
    for (const key in groupedData) {
        const group = groupedData[key];
        const avgZ = group.zValues.reduce((a, b) => a + b, 0) / group.zValues.length;
        averages.push({ x: group.x, y: group.y, z: avgZ });
    }

    return averages;
}

// Function to render the 3D chart
function render3DChart(id, title, data) {
    const xValues = data.map(item => item.numCustomers);  // x-axis values
    const yValues = data.map(item => item.numAvailableCashouts);  // y-axis values
    const zValues = data.map(item => item.timeTaken);     // z-axis values

    // Determine the maximum value for the x and y axes
    const maxAxisValue = Math.max(...xValues, ...yValues);

    const traceScatter = {
        x: xValues,
        y: yValues,
        z: zValues,
        mode: 'markers',
        marker: {
            size: 5,
            color: zValues,
            colorscale: 'Viridis',
            colorbar: {
                title: 'Tiempo total (ms) (z)',
                x: -0.1
            }
        },
        type: 'scatter3d',
        name: 'Diagrama de dispersión',
        visible: true  // Initially visible
    };

    const averagesData = calculateAverages(data);

    const traceLine = {
        x: averagesData.map(item => item.x),
        y: averagesData.map(item => item.y),
        z: averagesData.map(item => item.z),
        mode: 'lines',
        line: {
            color: 'blue',
            width: 2
        },
        type: 'scatter3d',
        name: 'Media',
        visible: true  // Initially visible
    };

    const layout = {
        title: title,
        scene: {
            xaxis: {
                title: 'Número de clientes (x)',
                range: [0, maxAxisValue]  // Linear correspondence
            },
            yaxis: {
                title: 'Número de cajas registradoras (y)',
                range: [0, maxAxisValue] // Linear correspondence
            },
            zaxis: {
                title: 'Tiempo total (ms) (z)',
            }
        }
    };

    const config = {
        responsive: true  // Enable responsive mode
    };

    Plotly.newPlot(id, [traceScatter, traceLine], layout, config);

    // Add resize event listener to make the chart responsive
    window.addEventListener('resize', () => {
        Plotly.Plots.resize(document.getElementById(id));
    });

    const switchEl = document.getElementById(`${id}-switch`);
    const switchContainerWidth = switchEl.clientWidth;
    const handleWidth = document.querySelector('.switch-handle').clientWidth;
    const thirdWidth = switchContainerWidth / 3;  // Dividing the width into 3 parts for left, mid, right

    // Add event listener to the switch element
    switchEl.addEventListener('click', (event) => {
        const rect = switchEl.getBoundingClientRect();
        const clickX = event.clientX - rect.left;  // Calculate the click's x-coordinates relative to the switch

        let scatterVisible = true;
        let averageVisible = true;

        if (clickX < thirdWidth) {
            switchEl.classList.remove('mid', 'right');
            switchEl.classList.add('left');
            averageVisible = 'legendonly';
        } else if (clickX < 2 * thirdWidth) {
            switchEl.classList.remove('left', 'right');
            switchEl.classList.add('mid');
        } else {
            switchEl.classList.remove('left', 'mid');
            switchEl.classList.add('right');
            scatterVisible = 'legendonly';
        }

        Plotly.restyle(id, { visible: scatterVisible }, [0]);
        Plotly.restyle(id, { visible: averageVisible }, [1]);
    });
}

// Main function to run the operations
async function main() {
    let data = await fetchTestData('js/cashouts-growing_test-results.json');
    if (data) {
        render3DChart('chart-cashouts', 'Crecen sensiblemente más las cajas registradoras', data);
    }

    data = await fetchTestData('js/customers-growing_test-results.json');
    if (data) {
        render3DChart('chart-customers', 'Crecen sensiblemente más los clientes', data);
    }

    data = await fetchTestData('js/equally-growing_test-results.json');
    if (data) {
        render3DChart('chart-equally', 'Crecen tanto las cajas registradoras como los clientes', data);
    }

    data = await fetchTestData('js/abnormally-low-cashouts_test-results.json');
    if (data) {
        render3DChart('chart-abnormally-low-cashouts', 'Cajas registradoras anormalmente bajas', data);
    }

    data = await fetchTestData('js/abnormally-high-customers_test-results.json');
    if (data) {
        render3DChart('chart-abnormally-high-customers', 'Clientes anormalmente altos', data);
    }
}

// Run the main function
main();