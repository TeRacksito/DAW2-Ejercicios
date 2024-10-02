import fs from 'fs';
import { Worker } from 'worker_threads';
import { fileURLToPath } from 'url';
import { dirname } from 'path';
import { performance } from 'perf_hooks';

// Helper to get __dirname in ES modules
const __filename = fileURLToPath(import.meta.url);
const __dirname = dirname(__filename);

async function runTests(maxCustomers, maxAvailableCashouts, totalTests, file) {
    const results = [];
    //const totalTests = Math.ceil(maxCustomers / step);
    let currentTest = 0;
	const customerStep = Math.ceil(maxCustomers / totalTests);
	const availableCashoutStep = Math.ceil(maxAvailableCashouts / totalTests);

    // Function to run a worker and return a promise
    const runWorker = (numCustomers, numAvailableCashouts) => {
        return new Promise((resolve, reject) => {
            const worker = new Worker(`${__dirname}/worker.mjs`, {
                workerData: { numCustomers, numAvailableCashouts },
                execArgv: ['--experimental-modules'] // Ensure the worker runs in module mode
            });
            worker.on('message', resolve);
            worker.on('error', reject);
            worker.on('exit', (code) => {
                if (code !== 0) reject(new Error(`Worker stopped with exit code ${code}`));
            });
        });
    };

    // Run tests in parallel using 6 threads
    while (currentTest < totalTests) {
        const workers = [];
        const remainingTests = totalTests - currentTest;
        const workersToRun = Math.min(5, remainingTests);

        for (let i = 0; i < workersToRun; i++) {
            const numCustomers = (currentTest + 1) * customerStep;
			const numAvailableCashouts = (currentTest + 1) * availableCashoutStep;
            workers.push(runWorker(numCustomers, numAvailableCashouts));
        }
		currentTest++;

        // Wait for all workers to complete
        const workerResults = await Promise.all(workers);
        results.push(...workerResults);

        const progress = Math.round((currentTest / totalTests) * 100);
        process.stdout.clearLine();
        process.stdout.cursorTo(0);
        process.stdout.write(`Progress: ${progress}% | Current test: ${currentTest}/${totalTests}`);
    }

    // Save results to a JSON file
    fs.writeFileSync(file, JSON.stringify(results, null, 2));

    console.log(`\nTest results saved to ${file}`);
}

// Configuration: Run tests
const maxCustomers = 1_000;
//const step = Math.round(maxCustomers / 200);
const totalTests = 200;
const maxAvailableCashouts = 100_000;
runTests(maxCustomers, maxAvailableCashouts, totalTests, 'cashouts-growing_test-results.json');