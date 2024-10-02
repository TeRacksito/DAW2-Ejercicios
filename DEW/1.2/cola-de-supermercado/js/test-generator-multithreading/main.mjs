import MinHeap from './min-heap.mjs';

function queueTime(customerItems, availableCashouts) {
    const cashouts = new MinHeap();
    let maxTime = 0;

    for (let i = 0; i < availableCashouts; i++) {
        cashouts.add(0);
    }

    for (let itemsNum of customerItems) {
        const fastestCashout = cashouts.remove();
        const newItemsNum = fastestCashout + itemsNum;
        cashouts.add(newItemsNum);
        maxTime = Math.max(maxTime, newItemsNum);
    }

    return maxTime; 
}

export default queueTime;
