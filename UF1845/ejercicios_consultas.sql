#Obtener los datos de los empleados con cargo ‘Secretaria’.
#SELECT * FROM empleados WHERE cargoE = "Secretaria";

#Obtener el nombre y salario de los empleados
#SELECT empleados.nomEmp, empleados.salEmp FROM empleados;

#Obtener los datos de los empleados vendedores, ordenado por nombre
#SELECT * FROM empleados WHERE cargoE = "Vendedor" ORDER BY nomEmp;

#Listar el nombre de los departamentos
#SELECT DISTINCT nombreDpto FROM departamentos;

#Obtener la lista de los empleados que ganan una comisión superior a su sueldo.
#SELECT * FROM empleados WHERE comisionE > salEmp;

#Listar el salario, la comisión, el salario total (salario + comisión), documento de identidad del empleado y nombre, de aquellos empleados que tienen comisión superior a 1.000.000, ordenar el informe por el número del documento de identidad
#SELECT salEmp, comisionE, (salEmp + comisionE) as Salario_Total, nDIEmp,nomEmp FROM empleados 
#WHERE comisionE > 1000000 ORDER BY nDIEmp;

#Listar los datos de los empleados cuyo nombre inicia por la letra ‘M’, su salario es mayor a $800.000 o reciben comisión y trabajan para el departamento de ‘VENTAS’
#SELECT * FROM empleados WHERE (nomEmp LIKE "M%" AND salEmp > 800000) OR (cargoE = "Ventas")

#Mostrar el salario más alto de la empresa
#SELECT salEmp, nomEmp FROM empleados ORDER BY salEmp DESC LIMIT 1;

#Hallar el salario más alto, el más bajo y la diferencia entre ellos
#SELECT MAX(salEmp), MIN(salEmp), MAX(salEmp) - MIN(salEmp) as Diferencia FROM empleados;

#Mostrar el número de empleados de sexo femenino y de sexo masculino, por departamento
#SELECT COUNT(*), sexEmp, codDepto FROM empleados GROUP BY codDepto,  sexEmp;

#Hallar el salario promedio por departamento
#SELECT AVG(salEmp), codDepto FROM empleados GROUP BY codDepto;

#Mostrar la lista de los empleados cuyo salario es mayor o igual que el promedio de la empresa. Ordenarlo por departamento
#SELECT * FROM empleados WHERE salEmp >= (SELECT AVG(salEmp) FROM empleados) ORDER BY codDepto;

#Hallar los departamentos que tienen más de tres empleados. Mostrar el número de empleados de esos departamentos
#SELECT COUNT(*), codDepto FROM empleados GROUP BY (codDepto) 
#HAVING COUNT(*) >= 3;

#Hallar los departamentos que no tienen empleados
#SELECT COUNT(*), codDepto FROM empleados GROUP BY (codDepto) 
#HAVING COUNT(*) = 0

#Mostrar el nombre del departamento cuya suma de salarios sea la más alta, indicando el valor de la suma
#SELECT nombreDpto, SUM(salEmp) FROM empleados,departamentos
#WHERE empleados.codDepto = departamentos.codDepto
#GROUP BY (departamentos.codDepto);
