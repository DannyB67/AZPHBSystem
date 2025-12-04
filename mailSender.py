import sys
import smtplib
from email.mime.text import MIMEText
from email.mime.multipart import MIMEMultipart
#from pyscript import document



# Database configuration
DB_CONFIG = {
    "host": "localhost",      # Change to your DB host
    "user": "root",           # Change to your DB user
    "password": "",   # Change to your DB password
    "database": "azphbsystem"  # Change to your DB name
}

# Email server configuration
SMTP_SERVER = "smtp.gmail.com"   # Example: Gmail SMTP
SMTP_PORT = 587
SENDER_EMAIL = "azphbooking@gmail.com"
SENDER_PASSWORD = "mwslhkfenllfnsgy"  # Use app password if Gmail is used

def send_email(recipient, subject, body):
    """Send an email to a single recipient."""
    msg = MIMEMultipart()
    msg["From"] = SENDER_EMAIL
    msg["To"] = recipient
    msg["Subject"] = subject

    msg.attach(MIMEText(body, "plain"))

    with smtplib.SMTP(SMTP_SERVER, SMTP_PORT) as server:
        server.starttls()
        server.login(SENDER_EMAIL, SENDER_PASSWORD)
        server.sendmail(SENDER_EMAIL, recipient, msg.as_string())
        print(f"Email sent to {recipient}")

def main():
    name = sys.argv[1]
    recipient = sys.argv[2]
    eventName = sys.argv[3]
    details = sys.argv[4]
    date = sys.argv[5]
    venue = sys.argv[6]
    subject = "AZPH Booking Confirmation"
    body = (f"Hello {name}, \n\n "
            f"Your booking request has been received for processing. Please see details of your booking below: \n\n "
            f"Event Name: {eventName} \n "
            f"Purpose Of Event or Event Description: {details} \n "
            f"Date: {date} \n "
            f"Intended Venue: {venue} \n\n "
            f"You will receive another email once your booking has been approved. \n\n "
            f"Thank you, \n "
            f"AZPH Booking System")

    try:
        send_email(recipient, subject, body)
    except Exception as e:
        print(f"Error: {e}")

if __name__ == "__main__":
    main()

