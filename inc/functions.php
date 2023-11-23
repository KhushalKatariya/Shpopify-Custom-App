<?php

function shopify_call($token, $shop, $api_endpoint, $query = array(), $method = 'GET', $request_headers = array())
{

	//  create article
//  Increase PHP execution time to 300 seconds (5 minutes) or an appropriate value
	ini_set('max_execution_time', 300);

	//Check if the article with the same title already exists
	$articleTitleToCheck = $query['article']['title'];

	// Initialize cURL session
	$ch = curl_init($api_endpoint);

	// Set cURL options for retrieving existing articles
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt(
		$ch,
		CURLOPT_HTTPHEADER,
		array(
			"Content-Type: application/json",
			"X-Shopify-Access-Token: $token"
		)
	);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

	// Execute cURL session to retrieve existing articles
	$response = curl_exec($ch);
	$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

	// Check for errors and handle response
	if ($httpCode == 200) {
		$existingArticles = json_decode($response, true)['articles'];
		$articleAlreadyExists = false;

		// Check if an article with the same title already exists
		foreach ($existingArticles as $existingArticle) {
			if ($existingArticle['title'] === $articleTitleToCheck) {
				$articleAlreadyExists = true;
				break;
			}
		}
		if ($articleAlreadyExists) {
			echo "Article with title '$articleTitleToCheck' already exists." . "<br>";
		} else {
			// Initialize cURL session for creating a new article
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($query));

			// Execute cURL session to create a new article
			$response = curl_exec($ch);
			$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

			// Check for errors and handle response
			if ($httpCode == 201) {
				echo "Article with title '$articleTitleToCheck' created successfully!" . "<br>";
			} else {
				echo "Error creating Article with title '$articleTitleToCheck'. Response code: $httpCode, Response: $response" . "<br>";
			}
		}
	} else {
		echo "Error retrieving existing articles with title '$articleTitleToCheck'. Response code: $httpCode, Response: $response" . "<br>";
	}

	// 	end article

	// $ch = curl_init($api_endpoint);

	// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	// curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	// 	"Content-Type: application/json",
	// 	"X-Shopify-Access-Token: $token"
	// ));
	// curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
	// curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($query));

	// // Execute cURL session to retrieve order data
	// $response = curl_exec($ch);
	// $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

	// Check for errors and handle the response and get the info of customers
/*	if ($httpCode == 200) {
		$customers = json_decode($response, true)['customers'];
		// print_r($customers);
		// Process the customer data as needed
		foreach ($customers as $customer) {
			$customerId = $customer['id'];
			$customerFirstName = $customer['first_name'];
			$customerLastName = $customer['last_name'];
			$customerEmail = $customer['email'];
			
			// Output customer information (customize as needed)
			echo "Customer ID: $customerId, First Name: $customerFirstName, Last Name: $customerLastName, Email: $customerEmail" . "<br>";
		}
	} else {
		echo "Error retrieving customers. Response code: $httpCode, Response: $response" . "<br>";
	} */

	// Check for errors and handle the response and POST(create) customers
/*	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($query));

	if ($httpCode == 201) {
		$createdCustomer = json_decode($response, true)['customer'];
		$customerId = $createdCustomer['id'];

		// Output the created customer's information
		echo "Customer ID: $customerId has been created successfully." . "<br>";
	} else {
		echo "Error creating customer. Response code: $httpCode, Response: $response" . "<br>";
	} */

	// Close cURL session

	// Check for errors and handle the response
/*	if ($httpCode == 200) {
		$orders = json_decode($response, true)['orders'];

		// Process the orders and print basic information
		foreach ($orders as $order) {
			$orderId = $order['id'];
			$orderNumber = $order['order_number'];

			// Output order information
			echo "Order ID: $orderId, Order Number: $orderNumber". "<br>";
		}
	} else {
		echo "Error retrieving orders. Response code: $httpCode, Response: $response" . "<br>";
	}
*/



	// Check for errors and handle the response

	/*	if ($httpCode == 201) {
						$order = json_decode($response, true)['order'];
						$orderId = $order['id'];
						
						echo "Order created successfully with ID: $orderId" . "<br>";
					} else {
						echo "Error creating order. Response code: $httpCode, Response: $response" . "<br>";
					}
				*/
	curl_close($ch);
}

?>