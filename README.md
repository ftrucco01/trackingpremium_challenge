# A code challenge for trackingpremium, SMF Framework (PHP)

The test consists of creating a functionality in Symfony to display a list of companies and allow the user to select one.

1. The view should have 3 sections:
	- Header: Contains a title and a short description.
	- Body: List of companies with a radio button for the user to select.
	- Footer: Continue button.
	
	
2. If the user presses the continue button without choosing a company, a dialog box indicating the error should be displayed.

3. If the user presses the continue button and a company has been selected, a dialog box indicating the chosen company should be displayed to the user.

 
List of Companies options:

1. Select the company where you want to perform your transactions.
2. Companies with description and radio button
3. Continue button

 
Example of data format:

```json
{
    "error": {
            "code": 0,
            "messages": "ok"
    },
    "maincompanies": [{
        "id": 1,
        "name": "Multitrack",
        "acronym": "maindemo"
    }]
}
```

# Requirements:
    1. The solution must be published in a public repository on Github or Bitbucket.
    2. Endpoint to retrieve the data: https://apidemo.trackingpremium.us/publicapi/v1/search_username?username=trackingpremium


# Solution:

The following is a list of key files:

Entities:
  - smf/src/Entity/Company.php
    - This non-mapped entity retrieves data from an endpoint and hydrates itself.

Services:
- smf/src/Service/DataCompanyGenerator.php
  - This custom container service is responsible for fetching data.

Collections:
- smf/src/Collection/CompanyCollection.php
  - This class populates the "fetched data" into ArrayCollection of company objects.

View:
- smf/templates/company/index.html.twig
  - This template uses Bootstrap and JavaScript to display the list of companies.

Controller:
- smf/src/Controller/CompanyController.php
  - This file handles HTTP requests and coordinates the interaction between the view, services, and entities.


The entities retrieve data, the services process it, the collections store it, and the view displays it. The controller acts as the central hub, managing communication between the different components.

# Video demo:

Is live and available only for 24 hours: https://streamable.com/3bi8ex

Link to download it: https://raw.githubusercontent.com/ftrucco01/trackingpremium_challenge/main/smf/public/demo.webm