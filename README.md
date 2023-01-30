# A code challenge for trackingpremium, SMF Framework (PHP)

The test consists of creating a functionality in Symfony to display a list of companies and allow the user to select one.

1. The view should have 3 sections:
	· Header: Contains a title and a short description.
	· Body: List of companies with a radio button for the user to select.
	· Footer: Continue button.
	
	
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
    } … ]
}
```

# Requirements:
    1. The solution must be published in a public repository on Github or Bitbucket.
    2. Endpoint to retrieve the data: https://apidemo.trackingpremium.us/publicapi/v1/search_username?username=trackingpremium