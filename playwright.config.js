const { defineConfig, devices } = require('@playwright/test');
const fs = require('fs');
const path = require('path');

const configuredBaseURL = process.env.SIPERBEN_BASE_URL || 'http://localhost/siperben';
const baseURL = configuredBaseURL.endsWith('/') ? configuredBaseURL : `${configuredBaseURL}/`;
const defaultStorageState = path.join(__dirname, '.playwright', 'auth', 'user.json');
const storageState = process.env.PLAYWRIGHT_STORAGE_STATE
  || (fs.existsSync(defaultStorageState) ? defaultStorageState : undefined);

module.exports = defineConfig({
  testDir: './tests/e2e',
  timeout: 30000,
  expect: {
    timeout: 5000
  },
  outputDir: 'test-results',
  reporter: [['list'], ['html', { open: 'never' }]],
  use: {
    baseURL,
    storageState,
    trace: 'retain-on-failure',
    screenshot: 'only-on-failure',
    video: 'retain-on-failure'
  },
  projects: [
    {
      name: 'chrome',
      use: {
        ...devices['Desktop Chrome'],
        channel: 'chrome'
      }
    }
  ]
});
