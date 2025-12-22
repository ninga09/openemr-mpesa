-- M-Pesa Payment Method Setup for OpenEMR
-- This script adds M-Pesa as a payment method and sets up necessary configuration keys

-- Insert M-Pesa into payment_method list_options
INSERT INTO list_options (list_id, option_id, title, seq, is_default, option_value, mapping, notes) VALUES
('payment_method', 'mpesa', 'M-Pesa', 0, 0, 0, '', 'M-Pesa mobile payment method');

-- Insert M-Pesa configuration keys into globals
-- These will need to be configured with actual M-Pesa Daraja API credentials
INSERT INTO globals (gl_name, gl_index, gl_value) VALUES
('mpesa_consumer_key', 0, ''),
('mpesa_consumer_secret', 0, ''),
('mpesa_passkey', 0, ''),
('mpesa_shortcode', 0, ''),
('mpesa_environment', 0, 'sandbox'); -- 'sandbox' or 'production'

-- Note: After running this script, configure the actual values in Administration > Globals
-- or directly in the database with your M-Pesa Daraja API credentials
