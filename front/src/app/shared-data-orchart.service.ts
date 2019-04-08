import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import 'rxjs/add/operator/map';


@Injectable({
  providedIn: 'root'
})
export class SharedDataOrchartService {

  constructor(public http: HttpClient) { }

  getUsers(){
    return this.http.get('http://localhost:4201/api/user')
                       .map(res => res);
  }

}


