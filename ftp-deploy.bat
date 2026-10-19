@echo off
title Deploy to Live Server - RBO Accounting
echo ========================================================
echo   RBO Accounting - Deploying Updates to Live Server
echo   Host: ftp.rboaccounting.ae (185.243.77.60)
echo   Target: https://www.rboaccounting.ae
echo ========================================================
echo.

python "%~dp0ftp-sync.py" deploy %*

echo.
pause
