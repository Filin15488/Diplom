FROM mcr.microsoft.com/mssql/server:2019-CU2-ubuntu-16.04
ENV MSSQL_SA_PASSWORD=mssql_stego2021
ENV ACCEPT_EULA=Y

COPY ./bak/stego_as.bak ./data_bak
COPY ./db_init /scripts

# восстановление бд из вне
#/opt/mssql-tools/bin/sqlcmd -S localhost -U SA -P mssql_stego2021 -d master -i /scripts/domain.sql