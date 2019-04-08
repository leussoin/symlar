import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { OrgchartSocietyComponent } from './orgchart-society.component';

describe('OrgchartSocietyComponent', () => {
  let component: OrgchartSocietyComponent;
  let fixture: ComponentFixture<OrgchartSocietyComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ OrgchartSocietyComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(OrgchartSocietyComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
