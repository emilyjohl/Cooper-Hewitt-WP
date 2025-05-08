jQuery(document).ready(function($) {
  // Makes the call when the button is clicked NEED TO ADD ON SUBMIT TOO
  $('#fetch-data-button').click(function(e) {
    e.preventDefault()
    const search = document.querySelector('#search').value;
    const objectTypeContainer = document.querySelector('#object-type-container');
    let sort = document.querySelector('#sort-by-menu-button').innerText;
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
              $('#apiResponse-container').html('<h3>' + response.response.message + '</h3>');
            }else {
              console.log('the response', response.response.rows[0])
              const title = response.response.rows[0].content.descriptiveNonRepeating.title.content;
              const dataSource = response.response.rows[0].content.descriptiveNonRepeating.data_source
              const link = response.response.rows[0].content.descriptiveNonRepeating.record_link
              const objectTypes = response.response.rows[0].content.indexedStructured.object_type
              console.log('types',objectTypes)
              $('#api-response-container').html(`<h3>${title}</h3><p>${dataSource}</p>`)
              objectTypes.forEach(type => {
                $('#api-response-container').append(`
                    <span class="object-type">${type},</span>
                `)
              })
              $('#api-response-container').append(`<a class="learn-more-link" href="${link}" target='_blank'>Click here to learn more!</a>`)
            }
          },
          error: function() {
            // Error handling for failed fetch
            $('#api-response-container').html('<p>Failed to fetch data.</p>');
          }
      });
  });

  const sortByMenuButton = document.getElementById('sort-by-menu-button');
  const sortBy = document.getElementById('sort-by');
  const sortByOptions = document.querySelectorAll('li')
  // const sort = document.getElementById('sort')

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
