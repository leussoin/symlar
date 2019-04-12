import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { FormGroup, FormControl, Validators, FormBuilder } from '@angular/forms';
import 'rxjs/add/operator/map';

@Injectable({
  providedIn: 'root'
})
export class PostDataSignupService {
       public form: FormGroup;




  BASE_URL = 'http://localhost:8000/';

  constructor(private http:HttpClient) { }

  getSignup(data){
    console.log(data);
    return this.http.post(this.BASE_URL + 'user/add', data)
                  .map(res => res);



}

}
