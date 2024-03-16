import smtplib
from email.mime.multipart import MIMEMultipart
from email.mime.text import MIMEText

# Email parameters
smtp_server = 'smtp.gmail.com'  # Replace with your SMTP server
smtp_port = 587  # Replace with the appropriate SMTP port (usually 587 for TLS)
sender_email = 'intrusionhunter.com'  # Your email address
sender_password = 'mbmo sxzh mdze dqnu'  # Your email password
recipient_email = 'sreejhajagadees@gmail.com'  # Recipient's email address

# Create the email message
message = MIMEMultipart()
message['From'] = sender_email
message['To'] = recipient_email
message['Subject'] = 'Automated Email Subject'

body = 'This is the email body. Sample mail using python in windows'
message.attach(MIMEText(body, 'plain'))

# Set up the SMTP connection
try:
    server = smtplib.SMTP(smtp_server, smtp_port)
    server.starttls()
    server.login(sender_email, sender_password)
except Exception as e:
    print(f"Failed to connect to the SMTP server: {str(e)}")
    exit()

# Send the email
try:
    server.sendmail(sender_email, recipient_email, message.as_string())
    print("Email sent successfully!")
except Exception as e:
    print(f"Failed to send the email: {str(e)}")
finally:
    server.quit()
