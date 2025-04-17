This is the code assessment for the Jr. Developer role with the Cooper Hewitt Digital Team, April 2025.

# Overview

Create a search page in the CooperHewitt WordPress theme that presents a form that accepts 1-3 query fields and sends a request to Smithsonian's [Open Access API](https://edan.si.edu/openaccess/apidocs/). Display the results or any error messages. 

Read more on Smithsonian Open Access [here](https://www.si.edu/openaccess) and Open Access Developer Tools [here](https://www.si.edu/openaccess/devtools).

# Criteria

Your project should also meet the following criteria:

1. The page should be responsive to different screen sizes and accessible for users who need assistive technologies for browsing pages.

  See WCAG 2.1 standards here:
  
  https://www.w3.org/TR/WCAG21/

2. The page is consistent with [Cooper Hewitt's main website](https://www.cooperhewitt.org/) but please feel free to add your own creative touch or design ideas.
  
  You can find the design elements and style guide here:
  https://www.dropbox.com/scl/fo/o3a04xzhdrdo6fpwd9pwk/ALThumSEKYKRT0oJaxl4sDA?rlkey=ljruvyossmxxu8zjg2ik887nu&e=1&dl=0

3. Please use git for your version control and be ready to show your commits.

# Instructions for Set Up

Please clone this repository to your local machine. You will need Docker to run the application locally.

https://www.docker.com/

Please download the content from the `docker-compse.yml` file from the Dropbox link that is shared with you (after you provide your preferred email address).

After you have all the components, copy the `docker-compse.yml` file to the root folder of the cloned repository. In the repository, run `docker-compose up -d`. It should start to install the docker images for WordPress and the database for running the application. After that is done, go to:

`localhost:8080`

You should see the WordPress landing page and it will ask you to set up your account for the first time.

After you set that up, log in and go to the WordPress dashboard by going to:

`localhost:8080/admin`

From the left hand panel, go to:

Tools -> Import -> Import WordPress and then choose the file shared with you from the Dropbox folder, `cooperhewittcodetestsite.WordPress.2024-07-11.xml`

Now you should be ready to go!
