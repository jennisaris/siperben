@echo off
set libreofficehome=%1
set path=%2
set filename=%3
set tempLibreOfficeProfile=%path%
rem echo %tempLibreOfficeProfile% %filename%
%libreofficehome% -env:UserInstallation=file:///%tempLibreOfficeProfile% --headless --convert-to pdf --outdir %tempLibreOfficeProfile% %filename%
rem dir %tempLibreOfficeProfile%