from flask import Flask, request, jsonify
from flask_sqlalchemy import SQLAlchemy

app = Flask(__name__)
app.config['SQLALCHEMY_DATABASE_URI'] = 'sqlite:///imagens.db'
db = SQLAlchemy(app)

class Imagem(db.Model):
    id = db.Column(db.Integer, primary_key=True)
    dados = db.Column(db.LargeBinary)

db.create_all()

@app.route('/upload', methods=['POST'])
def upload_imagem():
    if 'imagem' not in request.files:
        return jsonify({"message": "Nenhuma imagem enviada"}), 400

    arquivo = request.files['imagem']
    imagem_binaria = arquivo.read()
    nova_imagem = Imagem(dados=imagem_binaria)
    db.session.add(nova_imagem)
    db.session.commit()
    
    return jsonify({"message": "Imagem salva com sucesso!"})

if __name__ == "__main__":
    app.run(debug=True)
