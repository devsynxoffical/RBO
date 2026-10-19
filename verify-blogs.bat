@echo off
title Verify Blog Posts - Live vs Local
echo ========================================================
echo   RBO Accounting - Blog Posts Verification
echo   Checking 7 Published Blogs on Live vs Localhost
echo ========================================================
echo.

python "%~dp0ftp-sync.py" verify

echo.
pause
