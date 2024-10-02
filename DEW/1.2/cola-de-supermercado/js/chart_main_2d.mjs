// Function to calculate log(n) values for the chart
function calculateLogValues(data) {
    return data.map(item => ({
        numCustomers: item.numCustomers,
        logValue: Math.log(item.numCustomers)
    }));
}

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

// Function to render the chart
function renderChart(data) {
    const labels = data.map(item => item.numCustomers);  // x-axis labels
    const timeTakenData = data.map(item => item.timeTaken);  // y-axis data

    // Calculate log(n) values
    const logValues = calculateLogValues(data).map(item => item.logValue);

    // Define the chart data and configuration
    const chartConfig = {
        type: 'line',
        data: {
            labels: labels,  // Number of customers
            datasets: [
                {
                    label: 'Tiempo total (ms)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    data: timeTakenData,  // Time taken for each customer group
                    fill: false,
                    borderWidth: 2
                },
                {
                    label: 'log(n)',
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    data: logValues,  // log(n) values
                    fill: false,
                    borderWidth: 2
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Número de clientes'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Tiempo total (ms)'
                    }
                }
            }
        }
    };

    // Create the chart
    const ctx = document.getElementById('myChart').getContext('2d');
    new Chart(ctx, chartConfig);
}

// Main function to run the operations
async function main() {
    const data = await fetchTestData('js/test_results.json');
    if (data) {
        renderChart(data);
    }
}

// Run the main function
main();