 function confirmParking() {
        var licensePlate = document.getElementById('licensePlate').value;
        var selectedFloor = document.getElementById('floorSelect').value;

        // Placeholder action (replace with actual logic)
        alert('License Plate: ' + licensePlate + '\nSelected Floor: ' + selectedFloor);
    }

    function updateSpaces(floor) {
        // Simulate updating the remaining parking spaces for the specified floor
        const currentSpaces = parseInt(document.getElementById(`remainingSpaces${floor}`).textContent);
        const newSpaces = Math.max(0, currentSpaces - 1);
        
        // Update the displayed value
        document.getElementById(`remainingSpaces${floor}`).textContent = newSpaces;
    }
    