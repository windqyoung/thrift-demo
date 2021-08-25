# 代码生成
thrift -gen php:server -gen js -gen py -v -r .\apidl\service.thrift

# 安装依赖
composer install

# 启动服务器
php -S 0.0.0.0:9988

# 执行python客户端
py client.py
