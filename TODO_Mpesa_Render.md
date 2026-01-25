## Database Setup
- [ ] Run `sql/mpesa_setup.sql` to insert M-Pesa configuration keys into globals table
- [ ] Verify database connection and OpenEMR installation

## Security Configuration
- [ ] Configure M-Pesa credentials in globals table:
  - mpesa_consumer_key
  - mpesa_consumer_secret
  - mpesa_passkey
  - mpesa_shortcode
  - mpesa_environment (set to 'production' for live)
- [ ] Ensure credentials are stored securely (not in plain text files)

## Render Hosting Setup
- [ ] Create Render account and project
- [ ] Set up PostgreSQL database on Render
- [ ] Configure environment variables for database connection
- [ ] Deploy OpenEMR application to Render
- [ ] Configure domain and SSL certificate

## Testing
- [ ] Test M-Pesa authentication
- [ ] Test STK Push payment initiation
- [ ] Test callback processing
- [ ] Verify payment records are updated correctly

## Security Enhancements
- [ ] Implement HTTPS for callback URLs
- [ ] Add input validation for phone numbers
- [ ] Add rate limiting for payment requests
- [ ] Review and secure API credentials storage
=======
# M-Pesa Configuration and Render Hosting Tasks

## Database Setup
- [ ] Run `sql/mpesa_setup.sql` to insert M-Pesa configuration keys into globals table
- [ ] Verify database connection and OpenEMR installation

## Security Configuration
- [x] Modified Mpesa.php to prioritize environment variables over database globals
- [x] Created render.yaml with secure environment variable configuration
- [x] Created mpesa_env.example with required environment variables
- [ ] Set actual M-Pesa credentials as environment variables in Render:
  - MPESA_CONSUMER_KEY
  - MPESA_CONSUMER_SECRET
  - MPESA_PASSKEY
  - MPESA_SHORTCODE
  - MPESA_ENVIRONMENT (set to 'production' for live)
- [ ] Ensure credentials are stored securely (not in plain text files)

## Render Hosting Setup
- [x] Created render.yaml deployment configuration
- [ ] Create Render account and project
- [ ] Set up PostgreSQL database on Render
- [ ] Configure environment variables for database connection
- [ ] Deploy OpenEMR application to Render
- [ ] Configure domain and SSL certificate

## Testing
- [x] Created test_mpesa_render.php for deployment testing
- [ ] Test M-Pesa authentication
- [ ] Test STK Push payment initiation
- [ ] Test callback processing
- [ ] Verify payment records are updated correctly

## Security Enhancements
- [x] Environment variables prioritized for credential storage
- [ ] Implement HTTPS for callback URLs (handled by Render)
- [ ] Add input validation for phone numbers
- [ ] Add rate limiting for payment requests
- [ ] Review and secure API credentials storage
