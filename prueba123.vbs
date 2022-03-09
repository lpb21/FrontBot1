Dim fso, MiArchivo,ciudad,fechaUltPago,saldoActual
ciudad = "prueba123"
fechaUltPago = "456"
saldoActual = "789"

Set fso = CreateObject("Scripting.FileSystemObject")
Set MiArchivo = fso.CreateTextFile("C:\Users\carlos.santos\Desktop\ClaroBt\archivodeprueba.txt", True)
MiArchivo.WriteLine(ciudad & "|" & fechaUltPago & "|" & saldoActual)
MiArchivo.Close