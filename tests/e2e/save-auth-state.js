const fs = require('fs');
const path = require('path');
const { chromium } = require('@playwright/test');

const configuredBaseURL = process.env.SIPERBEN_BASE_URL || 'http://localhost/siperben';
const baseURL = configuredBaseURL.endsWith('/') ? configuredBaseURL : `${configuredBaseURL}/`;
const statePath = process.env.PLAYWRIGHT_STORAGE_STATE
  || path.join(__dirname, '..', '..', '.playwright', 'auth', 'user.json');

async function main() {
  const browser = await chromium.launch({
    channel: 'chrome',
    headless: false
  });
  const context = await browser.newContext({ baseURL });
  const page = await context.newPage();

  await page.goto(baseURL);

  console.log('');
  console.log('Login manual di browser Chrome yang terbuka.');
  console.log('Setelah halaman aplikasi sudah masuk, tekan Enter di terminal ini.');
  console.log('');

  await new Promise((resolve) => {
    process.stdin.resume();
    process.stdin.once('data', resolve);
  });

  fs.mkdirSync(path.dirname(statePath), { recursive: true });
  await context.storageState({ path: statePath });
  await browser.close();

  console.log(`Session Playwright tersimpan: ${statePath}`);
}

main().catch(async (error) => {
  console.error(error);
  process.exit(1);
});
