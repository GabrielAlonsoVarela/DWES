from operaciones import suma_de_dos_numeros, resta_de_dos_numeros, multiplicacion_de_dos_numeros, division_de_dos_numeros

continuar = 's'
print('Calculadora:')
while continuar == 's':
    n1 = float(input('Introduce el primer número: '))  # Convertir a float para permitir números con decimales
    n2 = float(input('Introduce el segundo número: '))  # Convertir a float para permitir números con decimales

    print("""Seleccione una opción:
    1. Suma
    2. Resta
    3. Multiplicación
    4. División""")
    
    op = input('Seleccione una opción (1, 2, 3 o 4): ')
    
    if op in ('1', '2', '3', '4'):
        if op == '1':
            resultado = suma_de_dos_numeros(n1, n2)
        elif op == '2':
            resultado = resta_de_dos_numeros(n1, n2)
        elif op == '3':
            resultado = multiplicacion_de_dos_numeros(n1, n2)
        elif op == '4':
            resultado = division_de_dos_numeros(n1, n2)
        
        print('El resultado es:', resultado)
    else:
        print('Opción no válida')
    
    continuar = input('¿Deseas hacer otra operación? (s/n): ')
