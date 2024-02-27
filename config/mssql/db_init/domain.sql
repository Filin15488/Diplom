USE [master]
IF NOT EXISTS (SELECT name, database_id, create_date FROM sys.databases WHERE name = 'stego_as')
    RESTORE DATABASE [stego_as] FROM  DISK = N'/data_bak' WITH  FILE = 1,  NOUNLOAD,  STATS = 5;
