# Cloud-Based-Local-Train-Ticketing-System
This Standard Operating Procedure provides a comprehensive guideline for the local train ticketing system website developed using HTML, CSS, and PHP. It outlines the key procedures, practices, and protocols to ensure the efficient functioning of the ticketing system and the delivery of a seamless user experience.Also it contains an interactive video to understand the concepts.

# Step 1: Home page of the e-TICKET website
After accessing the e-TICKET website on the home page there would be options to either Sign in for existing user ,or
Register as new user.
There would be an option in the header for "Contact Us" to write to us through e-mail for any help.

# Step 2: Register in-case of new user
To Register as new user on the e-TICKET website, click on the "Register" button and fill in the nessary deatils.
The form contains restrictions for specific format for "Email ID","Password" and "Contact Us" fields.
User Password in the "Password" and "Confirm Password" fields should match.
All the fields are mandatory and an error message will be displayed for any ambiguity.
After clicking on the Register Button your information will be safely stored in the database and you're ready to Sign In using your credentials.

# Step 3: Sign in (for already registered users)
To Sign In into your account on the e-TICKET website use the "Email ID" and "Password" you used while registering as a new user.
The Email ID and Password would be verified through database and "Invalid Credentials.Try Again!" would be displayed incase of wrong login info.
You sould be successfully logged in if your credentials are verified.

# Step 4: After Successful Sign IN
You would be redirected to the "Reserve Your Ticket" webpage where you need to fill out the necessary details to reserve your train ticket.
After Sign IN the header would be updated with your profile picture containg a drop-down with the options to view your account info under "My Account" and to "Sign Out".

# Step 5: Reserve Your Ticket
To reserve your ticket you should fill out the necessary details like "From (Source)" , "To (Destination)" , "Departure Date" , "Total number of Passengers" and "Travel Class".
"Return Date" is an optional field.
You can only book tickets for the "Departure Date" as current or future date, previous dates are not allowed.
After Filling out the details you should save the details using "Save Details" button which saves all the enetered details into the database for further processing.
After Saving the details you should click on the "Check Availability" button to check for the available trains based on your requirements.
**YOU SHOULD SAVE THE DETAILS FIRST AND THEN PROCEED FOR CHECK AVAILABILITY ELSE YOUR TICKET WILL NOT BE BOOKED**

# Step 6 : List of Available Trains
After clicking the "Check Availability" button the list of available trains according to the selected requirements would be displayed along with the per person ticket price.
Click the "BOOK NOW" button to reserve seats in the particular train and proceed to "Passenger Details" page.
The price for the particular train you selected would be updated in the database after you click on the "BOOK NOW" button.

# Step 7: Mention the Passenger Details
The "Passenger Deatils" page will display the coulumns for the number of passengers according to the "Number of Passenger" field you selected on the "Reserve Your Ticket" webpage.
You need to enter the "Name", "Age" and "Gender" for each passenger and click on the Continue Booking button.

# Step 8: Payment Gateway
On the Payment Gateway Page you would be asked to pay for the Ticket Price via "UPI" or "Card".
You need to pay using either of the option and click on the "Pay" button.

# Step 9: Booking Summary
After successful payment you would be redirected to the "Booking Summary" webpage where all your booking info would be displayed.
Your booking would have a unique "Booking ID" which would be saved for verifying your booking from the database.
Booking Summary would also contain information like "Name" ,"Email ID" ,"Source Station" ,"Destination" and the "Ticket Price".
You can print this using the "Print Receipt" button.

# Step 10: Addition Necessary Features
Every Page after Logging In into your account on the e-TICKET website would have "Contact Us" , "My Account" and "Sign Out" options.
"My Account" page will contain your account information like "Name" , "Email" , "Gender" ,"Date of Birth" and "Contact Number".
"Sign Out" option will Logout you from your account and you cannot go back to the previous page unless after Sign In.

https://github.com/madhav-agrr/Local-Train-Ticketing-System/assets/124513997/d1c34da0-9b66-4810-a0e1-245767d69358
