@echo ���ڰ�װmysql
set b=%cd%
rem copy /y my.ini %windir%\
cd bin
mysqld -install MySql55 --defaults-file="%b%/my.ini"
@pause