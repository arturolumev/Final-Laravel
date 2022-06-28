from calendar import weekheader
from dbm import dumb
from http.client import ImproperConnectionState
from json import dumps
from urllib import response
from flask import Flask, jsonify, request, Response
from flask_pymongo import PyMongo
from bson import json_util
from bson.objectid import ObjectId
from estructura import *
 

app = Flask(__name__)
app.config['MONGO_URI']='mongodb://localhost/pymongodb'

mongo = PyMongo(app)
@app.route('/proyecto', methods=['POST'])
def create_proyect():
    tituloproy = request.json['tituloproy']
    presupuestoproy = request.json['presupuestoproy']
    vacantesproy = request.json['vacantesproy']

    if tituloproy and presupuestoproy and vacantesproy:
        id = mongo.db.proyecto.insert_one(
            {'tituloproy': tituloproy, 'presupuestoproy':presupuestoproy, 'vacantesproy':vacantesproy}
        )
        response = {
            'id': str(id.inserted_id),
            'tituloproy' : tituloproy,
            'presupuestoproy' : presupuestoproy,
            'vacantesproy' : vacantesproy
        }
        return response
    else:
        {'mensaje':'error'}

    return{'mensaje':'recibido'}

@app.route('/proyectos', methods=['GET'])
def get_proyects():
    proyectos = mongo.db.proyecto.find()
    response = json_util.dumps(proyectos)
    
    return Response(response, mimetype='application/json')

@app.route('/proyecto/<id>', methods = ['GET'])
def get_proyecto(id):
    proyecto = mongo.db.proyecto.find_one({'_id' : ObjectId(id)})
    response = json_util.dumps(proyecto)
    cont = 0
    for i in response:
        if i == "_id":
            cont += 1
    print(cont)
    return Response(response, mimetype='application/json')

@app.route('/proyecto/<id>', methods = ['DELETE'])
def delete_proyect(id):
    mongo.db.users.delete_one({'id': ObjectId(id) })
    response = jsonify({'message':'Proyecto '+id+' elimiando'})
    return response


if __name__ == "__main__":
    app.run(debug=True)