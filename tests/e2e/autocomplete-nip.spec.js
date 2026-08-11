const { test, expect } = require('@playwright/test');

test('endpoint autocomplete NIP mengembalikan data pegawai untuk satker aktif', async ({ request }) => {
  const query = process.env.SIPERBEN_NIP_QUERY || '1966';
  const filter = process.env.SIPERBEN_SATKER_FILTER || '693187';

  const response = await request.post('kepegawaian/m_pegawai/getemployee', {
    form: { query, filter }
  });

  const text = (await response.text()).trim();
  expect(response.ok(), `HTTP ${response.status()} ${response.statusText()}: ${text.slice(0, 300)}`).toBeTruthy();
  expect(text, 'response kosong atau redirect login').not.toBe('');
  expect(text, 'endpoint ter-redirect ke login').not.toContain('user_authentication');

  const payload = JSON.parse(text);
  expect(Array.isArray(payload)).toBeTruthy();
  expect(payload.length, `tidak ada pegawai untuk query ${query} dan filter ${filter}`).toBeGreaterThan(0);
  expect(payload[0]).toEqual(
    expect.objectContaining({
      nip: expect.any(String),
      name: expect.any(String)
    })
  );
});
