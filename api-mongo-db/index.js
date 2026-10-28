//Importando as bibliotecas
const express = require('express');
const {MongoClient,ObjectId} = require('mongodb');

//Utilizando a biblioteca express
const app = express();
app.use(express.json());

//Conectando ao Cluster
const client = new MongoClient(process.env.MONGO_URI);
const produtos = client.db('loja').collection('produtos');

//Criando os metodos HTTP

//Metodo para inserir novos produtos
app.post('/produtos',async (req,res)=>{
    const novo_produto = await produtos.insertOne(req.body);
    res.status(201).json(novo_produto);
});

//metodo get para 
app.get('/produtos',async (req,res)=>{
    const lista = await produtos.find().toArray;
    res.json(lista);
});

app.get('/produtos/:id',async (req,res)=>{
    const resultado = await produtos.findOne({_id:new ObjectId(req.params.id)});
    res.json(resultado);
});

//metodo put para atualizar um produto expecifico
app.put('/produtos/:id',async (req,res)=>{
    const resultado = await produtos.updateOne({_id:new ObjectId(req.params.id)},{$ste:req.body});
    res.json(resultado);
});

//metodo para deletar um produtos em especifico
app.delete('/produtos/:id',async (req,res)=>{
    const resultado = await produtos.deleteOne({_id:new ObjectId(req.params.id)});
    res.json(resultado);
});


//Inicializando o servidor
client.connect()
    .then(()=>{
        console.log('Conectado ao MONGODB');
        app.listen(3000,()=>console.log('API rodando na porta 3000'));
    })
    .catch((erro)=>console.log('Erro ao conectar', erro.message));