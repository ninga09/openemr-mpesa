# Docker Build Fix for OpenEMR M-Pesa Integration

## Issues Fixed
- [x] Added missing PHP extensions (ldap, soap) required by composer dependencies
- [x] Modified composer install to ignore PHP platform requirements to allow installation with PHP 8.1

## Changes Made
- Updated Dockerfile to install libldap2-dev and enable ldap and soap PHP extensions
- Added --ignore-platform-req=php flag to composer install command

## Next Steps
- Test the Docker build to ensure it completes successfully
- Verify that the application runs correctly with the installed dependencies
- Consider updating composer dependencies to versions compatible with PHP 8.1+ in the future
