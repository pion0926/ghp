const SHEET_ID = '1pGX74e52B9P7teh5FXnzn2WXPgp7EanFsXKFNgP58mk';
const SHEET_NAME = '참여신청';

function doGet(e) {
  const payload = parseGetPayload_(e);
  const sheet = setupSheet_();

  if (payload && Object.keys(payload).length > 0 && payload.setup_only !== true) {
    const row = appendParticipationRow_(sheet, payload);
    return json_({
      success: true,
      message: '참여신청 행이 추가되었습니다.',
      sheetName: sheet.getName(),
      row
    });
  }

  return json_({
    success: true,
    message: '참여신청 시트 양식이 준비되었습니다.',
    sheetName: sheet.getName(),
    lastRow: sheet.getLastRow()
  });
}

function doPost(e) {
  const payload = parsePayload_(e);
  const sheet = setupSheet_();

  if (payload.setup_only === true) {
    return json_({
      success: true,
      message: '참여신청 시트 양식이 준비되었습니다.',
      sheetName: sheet.getName(),
      lastRow: sheet.getLastRow()
    });
  }

  const row = appendParticipationRow_(sheet, payload);

  return json_({
    success: true,
    message: '참여신청 행이 추가되었습니다.',
    sheetName: sheet.getName(),
    row
  });
}

function appendParticipationRow_(sheet, payload) {
  sheet.appendRow([
    payload.created_at || new Date(),
    payload.application_id || '',
    payload.member_type_label || '',
    payload.member_category_label || '',
    payload.payment_plan_label || '',
    payload.payment_method_label || '',
    payload.depositor_name || '',
    payload.amount || '',
    payload.applicant_name || '',
    payload.phone || '',
    payload.email || '',
    payload.receipt_requested_label || '',
    payload.join_route_label || '',
    payload.memo || '',
    payload.bank_name || '',
    payload.bank_account || '',
    payload.account_holder || ''
  ]);

  return sheet.getLastRow();
}

function setupSheet_() {
  const spreadsheet = SpreadsheetApp.openById(SHEET_ID);
  const sheet = spreadsheet.getSheetByName(SHEET_NAME) || spreadsheet.insertSheet(SHEET_NAME);
  const headers = [
    '신청일시',
    '신청번호',
    '회원유형',
    '신청자유형',
    '납부방식',
    '납부방법',
    '입금자명',
    '금액',
    '이름',
    '연락처',
    '이메일',
    '기부금영수증',
    '참여경로',
    '메모',
    '은행',
    '계좌번호',
    '예금주'
  ];

  const firstRow = sheet.getRange(1, 1, 1, headers.length).getValues()[0];
  const hasHeaders = firstRow.some(value => String(value).trim() !== '');

  if (!hasHeaders) {
    sheet.getRange(1, 1, 1, headers.length).setValues([headers]);
  } else {
    sheet.getRange(1, 1, 1, headers.length).setValues([headers]);
  }

  sheet.setFrozenRows(1);
  sheet.getRange(1, 1, 1, headers.length)
    .setFontWeight('bold')
    .setBackground('#eaf8f8')
    .setHorizontalAlignment('center');
  sheet.autoResizeColumns(1, headers.length);

  return sheet;
}

function parsePayload_(e) {
  if (!e || !e.postData || !e.postData.contents) {
    return {};
  }

  try {
    return JSON.parse(e.postData.contents);
  } catch (error) {
    return {};
  }
}

function parseGetPayload_(e) {
  if (!e || !e.parameter || !e.parameter.payload) {
    return {};
  }

  try {
    return JSON.parse(e.parameter.payload);
  } catch (error) {
    return {};
  }
}

function json_(data) {
  return ContentService
    .createTextOutput(JSON.stringify(data))
    .setMimeType(ContentService.MimeType.JSON);
}
