import subprocess
import os

# Función para pedir datos de usuario
def obtener_usuario():
    return input("Introduce el nombre de usuario de PostgreSQL (por defecto 'postgres'): ") or "postgres"

# Parámetros
usuario_postgres = obtener_usuario()
base_datos = "Tickealo"
script_create = "./create.sql"
script_import = "./import.sql"

# Ejecutar un script SQL
def ejecutar_sql(script_sql):
    if not os.path.exists(script_sql):
        print(f"❌ El archivo {script_sql} no existe.")
        return

    try:
        comando = ["psql", "-U", usuario_postgres, "-f", script_sql]
        subprocess.run(comando, check=True)
        print(f"✅ El script {script_sql} se ejecutó correctamente.")
    except subprocess.CalledProcessError as e:
        print(f"❌ Error al ejecutar el script {script_sql}: {e}")

# Ejecutar los scripts
print("\n🔧 Ejecutando scripts SQL (se solicitará contraseña al ejecutar)...")
ejecutar_sql(script_create)
ejecutar_sql(script_import)
