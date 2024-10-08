# 國立政治大學 - 課表視覺化顯示工具
將政大官方「全校課程查詢系統」中「我的追蹤清單」的課程內容，視覺化呈現於時間表上

## 工具1 - 影片使用講解
<h2 align="center">
  <a href="https://www.youtube.com/watch?v=j9xaPTR_LkE"><img
src="https://img.youtube.com/vi/j9xaPTR_LkE/0.jpg" style="background-color:rgba(0,0,0,0);" height="300" alt="tool1"></a>
</h2>

## 工具2 - 影片使用講解
<h2 align="center">
  <a href="https://www.youtube.com/watch?v=f5LlhgWk_30"><img
src="https://img.youtube.com/vi/f5LlhgWk_30/0.jpg" style="background-color:rgba(0,0,0,0);" height="300" alt="tool2"></a>
</h2>

## 動機
由於政大的選課系統僅在選課期間開放使用，若想提前規劃課程，加入官方追蹤清單後，常需要手動用 Excel 或紙筆繪製出時間表。
為了緩解這種不便，我開發了一個簡單的網頁工具，讓您可以隨時查看課表，無需等待選課系統開放。

## 工具1 - 使用方法

1. 訪問並登入 [課程查詢系統網站](https://qrysub.nccu.edu.tw/)
1. 點擊課程查詢系統網站中的「我的追蹤清單」
1. 右鍵單擊頁面並選擇 "另存新檔" (或按 Ctrl+S) 將網頁 .HTML 檔案存入本地電腦
1. 打開 [https://justin-code.io/timetab](https://justin-code.io/timetab)
1. 點擊 "選擇檔案" 將方才存下的 .HTML 檔案上傳至網頁
1. 點擊 "載入課表"，即可視覺化查看您目前的課表

## 工具2 - 使用方法

以下步驟僅需執行一次，網站會自動保存先前填入的網址：

1. 訪問並登入 [課程查詢系統網站](https://qrysub.nccu.edu.tw/)
1. 右鍵單擊頁面並選擇 "檢查" (或按下 F12) 並選擇 "網路" 分頁
1. 點擊課程查詢系統網站中的「我的追蹤清單」
1. 在 "網路" 分頁中，會出現一個傳輸封包的列表，找到 "名稱" 欄位並點擊該封包，然後複製其網址
1. 打開 [https://justin-code.io/timetab/dynamic_v1.html](https://justin-code.io/timetab/dynamic_v1.html)
1. 將複製的網址粘貼到網站上方的網址欄中
1. 點擊 "載入課表"，即可視覺化查看您目前的課表
