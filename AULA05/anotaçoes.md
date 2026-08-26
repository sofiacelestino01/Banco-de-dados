## AULA 05
Para filtrar colunas, utilizamos o comando:

```sql
SELECT nome,população FROM maiorescidades;
```
Para filtro de registros, utilizamos o comando:
```sql 
SELECT * from produtos 
WHERE estoque < 10;
```

Para ordenar os dados:
```sql
SELECT nome,populacao FROM
maiorescidades
ORDEN BY populacao DESC;
```

---

**UPDATE**: Update ou Delete sem `WHERE` ATINGE todas AS LINHAS! Não xiste Ctrl+Z :(

Fluxo seguro (sempre):
```mermaid
flowchart LR
   A["SELECT com o WHERE"] -->
   B{"Retornou a linha certa?"}
   B --NÃO-->A
   B --SIM -->C["Update ou Delete com  mesmo WHERE"]
   C -->D["SELECT para conferir"]
   ```

---
Também é possível realizar cálculos;
```sql 
UPDATE maiorescidades
SET populacao = populacao - 7489
WHERE nome='Toquio';
```

**DELETE**
Para apagar registros:
```sql
DELETE FROM maiorescidades 
WHERE nome = 'Jacarta';
```