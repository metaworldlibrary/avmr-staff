# Amazing View Mountain Resort

## Company details must be in database
- contact #
- logo
- address
- email address
- account name (for bank)
- account no. (for bank)
- history (anchan note: homepage's descrition)
- all text that can be modified      
        
# CHANGES	

## General
- send email after sucessfull reservation
- send email after successful admin confirmation
- print reports(open new tab->launch print function)
- billing summary of the user in guest dashboard
- signing-in breaks the process
- disable room and rates tab when logged in(it breaks process)
- form validation
- editing prevents getting the same room
- creating multiple user randomly
- confirm reservation in admin side
- add upload function for client side
- add total amount balance for guest session
- vat, discount, add amenity, settle balance
- indetailed reports
- add person, additional bed
- disable deletion for reservation with payment*


## Check-in, Check-out dates
- The date should show up upon clicking the box.
- Can't book before the present day. (Ex. Today is Feb 17,2020, you
can't book the dates before Feb. 17,2020.)
- Upon booking, the user will be able to see the amount he/she paid and 
the method of payment.
- When the user is using a phone, the tab shouldn't switch when swiping to
left/right.
- There should be an option for the guest to order Breakfast/Lunch/Dinner
before booking a room.

## Login Issue
- After creating an account, it should not skip the confirm button like
last time.
- Validations should apply on the registration.
- Textbox should be aligned after confirming the registration.
Check-in
- The status must be "Waiting" if the guest isn't checked in yet.
- If the guest paid the 50% downpayment already and checked in, the status
should be "Checked In" in red font.
- The guest should be able to reschedule and edit his/her booking.

## Billing
- Every expense should be computed and visible in the 
receipt. Ex. Pillows, matress, etc.
- VAT should be visible in the receipt.

# Admin Module

## Check In
- The system should be able to know how the guest paid for the
downpayment.
- The system should be able to add, edit, and delete a room.
- The system should be able to manage a walk-in guest (Including 
amenities wanted by the guest).

## Check out
- Upon checking out, the system should be able to print out a report
for expenses.
- When the guest checked out, the status of the room would be Waiting again.

# Reservation process
- Search using dates and guest num
- Output room type where it matches from above
- Create account / login account (when we show this out to the panel, there are cases that it doesnt accept registration and jumps back to the home page)
- Summary page (this was pointed out to be not of UX friendly)
- Email sending details of payment, terms, reference code and what not (have an idea on this, i think its name is PHPMailer)
- Guest sending payment slip thru upload on the guest dashboard
- Front desk approving the reservation if its paid in full, downpayment, etc etc.
- Guest receives email that the reservation has been confrimed
- When guest arrives at the resort, front desk assigns room num of what is available with respect to the room type, changing its status to "check in"
- When checking out, billing details should be printed to mirror what happened within the hotel (shows extra person, extra bed, appliance fee, the price of the room, the discounts from senior citizens, and payment of balance if not paid in full)
