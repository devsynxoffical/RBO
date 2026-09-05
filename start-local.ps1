# Start RBO Accounting on http://localhost:8080
$phpDir = 'C:\Users\New Moon\AppData\Local\Microsoft\WinGet\Packages\PHP.PHP.8.2_Microsoft.Winget.Source_8wekyb3d8bbwe'
$mysql = 'C:\Program Files\MariaDB 12.3\bin\mysqld.exe'
$ini = 'C:\Program Files\MariaDB 12.3\data\my.ini'
$site = Split-Path -Parent $MyInvocation.MyCommand.Path

$env:Path = "$phpDir;" + $env:Path

$mysqlUp = $false
try {
    $tcp = New-Object System.Net.Sockets.TcpClient
    $tcp.Connect('127.0.0.1', 3306)
    $mysqlUp = $tcp.Connected
    $tcp.Close()
} catch {
    $mysqlUp = $false
}

if (-not $mysqlUp) {
    Write-Host 'Starting MariaDB...'
    Start-Process -FilePath $mysql -ArgumentList "--defaults-file=`"$ini`"" -WindowStyle Hidden
    Start-Sleep -Seconds 4
}

Write-Host 'RBO site: http://localhost:8080'
Write-Host 'WP admin: http://localhost:8080/wp-admin'
Set-Location $site
& php -S localhost:8080 router.php
