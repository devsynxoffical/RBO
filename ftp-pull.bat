@echo off
title Pull from Live Server - RBO Accounting
echo ========================================================
echo   RBO Accounting - Pulling Files from Live Server
echo   Host: ftp.rboaccounting.ae (185.243.77.60)
echo ========================================================
echo.

python "%~dp0ftp-sync.py" pull %*

echo.
pause
