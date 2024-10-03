<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<div class="search-wrapper">
    <div class="search-input">
    <input type="text" placeholder="Type to search..." id="searchInput">
    <div id="suggestions">
        <a id="sug-1" href="#">Khushal</a>
        <a id="2" href="#">Vishal</a>
        <a id="3" href="#">Hiren</a>
        <a id="4" href="#">Jaydip</a>
        <a id="5" href="#">Abhay</a>
        <a id="6" href="#">Bhavik</a>
        <a id="7" href="#">Darsh</a>
        <a id="8" href="#">Mayur</a>
    </div>
    <div class="search-icon"><i class="fas fa-search"></i></div>
    <div class="error-message" id="errorMessage">No matching suggestion found</div>
    <div class="cancel-button" id="cancelButton"><i class="fas fa-times-circle"></i></div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script> 

<style>
      /* Add your styles here */
        .search-wrapper {
        margin: 50px;  
        }

        .search-input {
        position: relative;
        max-width: 300px;
        margin: auto; 
        }

        input[type="text"] {
        width: calc(100% - 32px);
        padding: 8px;
        padding-left: 35px;
        outline: none;
        border: 2px solid #ccc;
        border-radius: 50px;
        }

        input[type="text"]:focus {
        border: 2px solid  rgb(146, 146, 146) !important;
        }

        #suggestions {
        list-style: none;
        padding: 0;
        display: none;
        position: absolute;
        background-color: white;
        width: 100%;
        border: 1px solid #ccc;
        z-index: 1;
        }

        #suggestions a {
        display: block;
        padding: 8px;
        border-bottom: 1px solid #eee;
        text-decoration: none;
        color: #333;
        }

        #suggestions a:last-child {
        border-bottom: none;
        }

        input::placeholder {
        color: rgb(146, 146, 146);
        }

        .error-message {
        display: none;
        color: red;
        margin-top: 5px;
        }

        .cancel-button {
        position: absolute;
        top: 19px;
        right: 0px;
        transform: translateY(-50%);
        cursor: pointer;
        display: none;
        }

        .search-icon{
        position: absolute;
        top: 8px;
        left: 10px;
        }
    </style>

    <script defer>

        const searchInput = document.getElementById('searchInput');
        const suggestionsList = document.getElementById('suggestions');
        const errorMessage = document.getElementById('errorMessage');
        const cancelButton = document.getElementById('cancelButton');

        searchInput.addEventListener('input', function () {
        const inputValue = this.value.trim().toLowerCase();
        const suggestionItems = suggestionsList.querySelectorAll('a');

        let hasMatches = false;

        suggestionItems.forEach(function (listItem) {
            const textValue = listItem.textContent.toLowerCase();
            const displayStyle = textValue.includes(inputValue) ? 'block' : 'none';
            listItem.style.display = displayStyle;
            hasMatches = hasMatches || displayStyle === 'block';
        });

        suggestionsList.style.display = hasMatches ? 'block' : 'none';
        errorMessage.style.display = hasMatches || inputValue.length === 0 ? 'none' : 'block';
        cancelButton.style.display = inputValue.length > 0 ? 'block' : 'none';
        });

        cancelButton.addEventListener('click', function () {
            searchInput.value = '';
            suggestionsList.style.display = 'none';
            errorMessage.style.display = 'none';
            cancelButton.style.display = 'none';
        }); 

        
        suggestionsList.addEventListener('click', function () {
            console.log(this);
        }); 
    </script>