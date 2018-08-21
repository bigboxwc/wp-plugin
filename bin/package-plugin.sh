#!/bin/bash

# Include useful functions
source "$(dirname "$0")/wp-bin/wp-bin.sh"

# Exit if any command fails
set -e

# Change to the expected directory
go_to_root

PACKAGE_NAME="wp-plugin"
PACKAGE_VERSION=$(get_package_version_number)
PACKAGE_VERSION_PLACEHOLDER="PLUGIN_VERSION"

# Setup plugin
source "$(dirname "$0")/setup-plugin.sh"

# Update version in files.
sed -i "" "s|%${PACKAGE_VERSION_PLACEHOLDER}%|${PACKAGE_VERSION}|g" plugin.php

# Generate the plugin zip file
status_message "Creating archive..."
zip -r $PACKAGE_NAME.zip \
	plugin.php \
	app \
	bootstrap \
	public \
	vendor/ \
	LICENSE \
	CHANGELOG.md \
	-x *.git*

# Rename and cleanup.
rezip_with_version $PACKAGE_NAME $PACKAGE_VERSION

# Reset generated files.
git reset head --hard

success_message "📦 Version $PACKAGE_VERSION build complete."
