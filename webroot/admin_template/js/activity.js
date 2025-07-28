// webroot/js/activity.js

(function () {
    
    
    
    let inactivityTime = function () {
        
        let time;
        let inactivityLimit = 10 * 60 * 1000; // 30 minutes in milliseconds

        // Reset the timer when there is user activity
        window.onload = resetTimer;
        document.onmousemove = resetTimer;
        document.onkeypress = resetTimer;
        document.onscroll = resetTimer;
        document.onclick = resetTimer;

        function updateActivity() {
            
           
            
            
            
            
            // Send a request to the server to update the last activity timestamp
            fetch('https://www.finmocktest.com/admin/users/updateActivity', {
                method: 'POST',
                
                credentials: 'same-origin'
            })
            .then(response => response.json())
            .then(data => {
                if (!data.success) {
                    console.error('Error updating activity:', data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }

        function resetTimer() {
            
          
            
            clearTimeout(time);
            time = setTimeout(updateActivity, inactivityLimit); // Update activity after inactivity limit
        }
    };

    inactivityTime();
})();
