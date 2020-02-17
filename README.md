# Amazing View Mountain Resort
website

    -Test all possible scenarios
    - book 
        - check in(room will not be available)
        - check out (room now available)
        - book based on number of guests.
        - need to rooms that can be selected
        - Ex. 10 guest - can offer a single room can be accomodated by 10 persons or several rooms that be selected to accomodate 10 -persons
        - cancel w/ refund: (anchan note: ask me later about refund policy)
        - cancel w/o refund
        - rebook: check in -> check out
        - ~~need to send copy of docu on or before feb 4~~ (anchan note: thats not something we are concern of)
    
    Admin Module
    - allow the user to modify from details
        -image
        -desc
        -price
    - approve / dissapprove reservation
    - can modify check out date (for extension)
    - can modify / approve check in/checkout (for rebooking)(also applies to walk in guest)
    - can facilitate walk in guest
    - can generate reports
        - list of rooms
        - list of guests
        - room status
        - hotel details
    - ~~date holiday (for promotions)~~(anchan note: i have other ideas for this, ignore)
    - company details must be in database
        - contact #
        - logo
        - address
        - email address
        - account name (for bank)
        - account no. (for bank)
        - history (anchan note: homepage's descrition)
        - all text that can be modified      

-> search using dates and guest num
-> output room type where it matches from above
-> create account / login account (when we show this out to the panel, there are cases that it doesnt accept registration and jumps back to the home page)
-> summary page (this was pointed out to be not of UX friendly)
-> email sending details of payment, terms, reference code and what not (have an idea on this, i think its name is PHPMailer)
->guest sending payment slip thru upload on the guest dashboard
-> front desk approving the reservation if its paid in full, downpayment, etc etc.
-> guest receives email that the reservation has been confrimed
-> when guest arrives at the resort, front desk assigns room num of what is available with respect to the room type, changing its status to "check in"
-> when checking out, billing details should be printed to mirror what happened within the hotel (shows extra person, extra bed, appliance fee, the price of the room, the discounts from senior citizens, and payment of balance if not paid in full)
