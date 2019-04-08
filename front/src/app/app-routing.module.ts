import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { SignupFormComponent } from '../app/signup-form/signup-form.component';
import { UserFormComponent } from '../app/user-form/user-form.component';
import { User } from './User';
import { OrgchartSocietyComponent } from '../app/orgchart-society/orgchart-society.component';
import { SharedJsonComponent } from '../app/shared-json/shared-json.component';

const routes: Routes = [
  { path:'signup-form', component:SignupFormComponent },
  { path:'user-form', component:UserFormComponent },
  { path:'orgchart-society', component:OrgchartSocietyComponent},
  { path:'shared-json', component:SharedJsonComponent}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
