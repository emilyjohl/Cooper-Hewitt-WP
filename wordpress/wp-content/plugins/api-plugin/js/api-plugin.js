jQuery(document).ready(function($) {
  // Makes the call when the button is clicked NEED TO ADD ON SUBMIT TOO
  $('#fetchDataButton').click(function(e) {
    e.preventDefault()
    const search = document.querySelector('#search').value;
    let sort = document.querySelector('#sortByMenuButton').innerText;
    sort = sort.toLowerCase()

    // Fallback if sort is not clicked
    if(sort === 'sort by')sort = 'relevancy'
    console.log('sort value', sort)

      $.ajax({
          url: `https://api.si.edu/openaccess/api/v1.0/search?q=${search}&sort=${sort}&api_key=${myApiPlugin.api_key}`,
          type: 'GET',
          data: {
              action: 'fetch_data_from_api',
          },
          success: function(response) {
            // Display data into the response container
            if(response.response.rowCount <= 0){
              $('#apiResponseContainer').html('<h3>' + response.response.message + '</h3>');
            }else {
              console.log('the response', response)
              $('#apiResponseContainer').html('<h3>' + response.response.rows[0].title + '</h3>');
            }
          },
          error: function() {
            // Error handling for failed fetch
            $('#apiResponseContainer').html('<p>Failed to fetch data.</p>');
          }
      });
  });

  const sortByMenuButton = document.getElementById('sortByMenuButton');
  const sortBy = document.getElementById('sortBy');
  const sortByOptions = document.querySelectorAll('li')
  const sort = document.getElementById('sort')

  sortByMenuButton.addEventListener('click', (e) => {
    e.preventDefault();
    const expanded = sortByMenuButton.getAttribute('aria-expanded') === 'true';
    sortByMenuButton.setAttribute('aria-expanded', !expanded);
    sortBy.hidden = expanded;

    if (!expanded) {
      const items = [...sortBy.querySelectorAll('li')];
      items[0].focus();
    }
  });


  sortBy.addEventListener('keydown', (e) => {
    const items = [...sortBy.querySelectorAll('li')];
    let index = items.indexOf(document.activeElement);

    if (e.key === 'ArrowDown') {
      e.preventDefault();
      index = (index + 1) % items.length;
      items[index].focus();
    } else if (e.key === 'ArrowUp') {
      e.preventDefault();
      index = (index - 1 + items.length) % items.length;
      items[index].focus();
    } else if (e.key === 'Escape') {
      sortBy.hidden = true;
      sortByMenuButton.focus();
    }else if (e.key === 'Enter') {
      sortBy.hidden = true;
      sortByMenuButton.innerText = e.target.innerText;
    }

  });

  sortByOptions.forEach(option => {
    option.addEventListener('click', (e) => {
      e.preventDefault()
      sortBy.hidden = true;
      sortByMenuButton.innerText = e.target.innerText;
    })
  })

  
});
