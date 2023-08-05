
<script src="{{asset('/')}}assets/js/jquery.js"></script>
<script src="{{asset('/')}}assets/js/typed.js"></script>
<script src="{{asset('/')}}assets/js/plugins.js"></script>
<script src="{{asset('/')}}assets/js/bootstrap.bundle.js"></script>
<script src="{{asset('/')}}assets/js/main.js"></script>


<script>
    var options = {
        strings: ["Android Application Developer", "Web Developer", "Youtuber"],
        typeSpeed: 40,
        backSpeed: 40,
        loop: true
    }
    var typed = new Typed("#typed-text", options);
</script>

<script>
    // Function to toggle dark and white mode
    function toggleDarkMode() {
        document.body.classList.toggle("dark-mode");
        // Store the user's dark mode preference in localStorage
        if (document.body.classList.contains("dark-mode")) {
            localStorage.setItem("darkMode", "enabled");
        } else {
            localStorage.setItem("darkMode", "disabled");
        }
    }

    // Check the user's preferred color scheme on page load
    if (window.matchMedia("(prefers-color-scheme: dark)").matches) {
        // If user's preferred color scheme is dark, set dark mode
        document.body.classList.add("dark-mode");
        localStorage.setItem("darkMode", "enabled");
    } else {
        // If user's preferred color scheme is light, check for previous user preference
        const userPreference = localStorage.getItem("darkMode");
        if (userPreference === "enabled") {
            document.body.classList.add("dark-mode");
        }
    }

    const toggleButton = document.getElementById("toggle-mode");
    toggleButton.addEventListener("click", toggleDarkMode);






    // JavaScript to handle the download button click
    const downloadButton = document.getElementById('downloadButton');
    const detailsContent = ``;

    downloadButton.addEventListener('click', function() {
        // Create a new Blob with the details content
        const blob = new Blob([detailsContent], { type: 'text/plain' });

        // Create a new anchor element to trigger the download
        const anchor = document.createElement('a');
        anchor.href = URL.createObjectURL(blob);
        anchor.download = 'details.txt'; // Specify the file name
        anchor.style.display = 'none';

        // Append the anchor to the document and click it to trigger the download
        document.body.appendChild(anchor);
        anchor.click();

        // Remove the anchor element after the download has started
        document.body.removeChild(anchor);
    });

    // JavaScript to handle the "Show Details" button click and disable it
    const showButton = document.getElementById('showButton');
    const details = document.querySelector('details');

    showButton.addEventListener('click', function() {
        details.open = !details.open;
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Add an event listener to the file input
    $('input[name="images[]"]').on('change', function (event) {
        const files = event.target.files;
        const imageURLs = [];

        // Read the uploaded images and get their URLs
        for (let i = 0; i < files.length; i++) {
            const reader = new FileReader();
            reader.onload = function (e) {
                imageURLs.push(e.target.result);

                // Check if all images have been read, then create the slider
                if (imageURLs.length === files.length) {
                    createSlider(imageURLs);
                }
            };
            reader.readAsDataURL(files[i]);
        }
    });

    function createSlider(images) {
        // Clear any existing slider elements
        $('.slider-container').html('');

        // Create slider elements dynamically based on the number of images
        images.forEach(image => {
            const imgElement = $('<img>').attr('src', image).addClass('slider-image');
            $('.slider-container').append(imgElement);
        });
    }
</script>


