// assets/js/snacks_form.js

document.addEventListener('DOMContentLoaded', function () {
    const typeSelect = document.querySelector('.snack-type-select');
    const nameSelect = document.querySelector('.snack-name-select');

    typeSelect.addEventListener('change', function () {
        const selectedType = typeSelect.value;
        const nameOptions = nameSelect.querySelectorAll('option');

        nameOptions.forEach(function (option) {
            if (option.dataset.type !== selectedType && option.value !== '') {
                option.remove();
            }
        });

        fetchSnackNames(selectedType);
    });

    function fetchSnackNames(type) {
        fetch('/get-snack-names/' + type) // Adjust the route URL as needed
            .then(response => response.json())
            .then(data => {
                populateNameOptions(data);
            })
            .catch(error => console.error('Error fetching snack names:', error));
    }

    function populateNameOptions(snackNames) {
        nameSelect.innerHTML = '<option value="">Select a snack</option>';

        snackNames.forEach(function (snack) {
            const option = document.createElement('option');
            option.value = snack;
            option.textContent = snack;
            option.dataset.type = typeSelect.value;
            nameSelect.appendChild(option);
        });
    }
});
