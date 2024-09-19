document.addEventListener("DOMContentLoaded", function () {
    const containers = document.querySelectorAll('.exercise_container');

    containers[0].classList.add('exercise_container_hovered');

    containers.forEach(div => {
        div.addEventListener('mouseenter', function () {
            containers.forEach(d => d.classList.remove('exercise_container_hovered'));
            this.classList.add('exercise_container_hovered');
        });
    });
});
