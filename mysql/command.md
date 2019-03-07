## 基本命令

```mysql
show databases; //查看mysql有多少库
show tables [table name]; //查看有多少表
desc [table name]; //查看数据表详情
show create table [table name]; show//查看数据表详情
create database [database name]; //创建数据库
drop database [database name];  //删除数据库
show variables like 'general_log_file'; //查看系统状态管理模块
show status  //查看系统状态管理模块
check table [table name];  //校验表
repair table [table name] //修复表
flush privileges  //强行让MySQL 更新Load 到内存中的权限信息
show processlist; //查看MySQL当前用户占用的连接数
explain [sql query] //执行计划详情
```

##mysql基本常识
```mysql
Innodb
事务级别 : SQL92 标准所定义的所有四个级别（READ UNCOMMITTED，READ COMMITTED，REPEATABLE READ 和SERIALIZABLE）;
undo: 为了保证数据的一致性已经并发时候的性能，通过对undo信息，实现了数据的多版本读取。

锁定机制: 行锁机制的实现是通过索引来完成
```

##优化


```mysql
Innodb
#行构造函数表达式的范围优化
优化器能够将范围扫描访问方法应用于此表单的查询：
SELECT ... FROM t1 WHERE ( col_1, col_2 ) IN (( 'a', 'b' ), ( 'c', 'd' ));
以前，对于要使用的范围扫描，有必要将查询编写为：
SELECT ... FROM t1 WHERE ( col_1 = 'a' AND col_2 = 'b' )
OR ( col_1 = 'c' AND col_2 = 'd' );
```

##常量

```mysql
SQL_NO_CACHE  //取消sql 缓冲

```
