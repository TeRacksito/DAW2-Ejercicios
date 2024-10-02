import { parentPort, workerData } from 'worker_threads';
import queueTime from './main.mjs';
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

// Run tests and return results
function runTest(numCustomers, numAvailableCashouts) {
    const scenario = 'random';
    const customerItems = generateTestData(numCustomers, scenario);

    // Measure execution time
    const start = performance.now();
    const result = queueTime(customerItems, numAvailableCashouts);
    const end = performance.now();

    const timeTaken = end - start;

    return {
        numCustomers,
		numAvailableCashouts,
        timeTaken
    };
}

// Worker logic
const { numCustomers, numAvailableCashouts } = workerData;
const result = runTest(numCustomers, numAvailableCashouts);
parentPort.postMessage(result);