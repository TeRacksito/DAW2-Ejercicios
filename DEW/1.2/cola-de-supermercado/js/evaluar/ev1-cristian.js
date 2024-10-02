function queueTime(customers, n) {
    let queues = new Array(n).fill(0);
    let max = 0;

    for (let customer of customers) {
        queues.sort((a, b) => a - b);
        queues[0] += customer;
        max = Math.max(max, queues[0]);
    }
    return max;
}


console.log(queueTime([5,3,4], 1));
console.log(queueTime([10,2,3,3], 2));
console.log(queueTime([2,3,10], 2));
console.log(queueTime([2,3,10,4,3], 2));
console.log(queueTime([2,3,10,4,3], 2));
console.log(queueTime([5,2,3,6,7,1,4,9,2,6,4], 3));
console.log(queueTime([], 2));
console.log(queueTime([1, 2], 0));

