import queueTime from './main.mjs';
import fs from 'fs';
import { performance } from 'perf_hooks';

// Generate test data: best-case and worst-case
function generateTestData(numCustomers, scenario) {
    if (scenario === 'best') {
        // Best-case: evenly distributed load
        return Array.from({ length: numCustomers }, () => 10);  // constant small number of items
    } else if (scenario === 'worst') {
        // Worst-case: one large customer, others small
        const data = Array.from({ length: numCustomers }, () => 1);  // small customers
        data[0] = numCustomers * 10;  // one customer with a massive load
        return data;
    } else {
        // Random case
        return Array.from({ length: numCustomers }, () => Math.floor(Math.random() * 100));
    }
}

// Run tests and save results
async function runTests(maxCustomers, step, availableCashouts) {
    const results = [];

    for (let numCustomers = step; numCustomers <= maxCustomers; numCustomers += step) {
        // Test different scenarios
        const scenarios = ['random'];

        for (const scenario of scenarios) {
            const customerItems = generateTestData(numCustomers, scenario);

            // Measure execution time
            const start = performance.now();
            const result = queueTime(customerItems, availableCashouts);
            const end = performance.now();

            const timeTaken = end - start;

            // Save the test results
            results.push({
                scenario,
                numCustomers,
                timeTaken,
                result
            });

            const progress = Math.round((numCustomers / maxCustomers) * 100);
            process.stdout.clearLine();
            process.stdout.cursorTo(0);
            process.stdout.write(`Progress: ${progress}% | Current number of customers: ${numCustomers}`);
        }
    }

    // Save results to a JSON file
    fs.writeFileSync('test_results.json', JSON.stringify(results, null, 2));

    console.log('Test results saved to test_results.json');
}

// Configuration: Run tests
const totalTests = 50;
const maxCustomers = 100_000_000;
runTests(maxCustomers, Math.round(maxCustomers / totalTests), 3);
